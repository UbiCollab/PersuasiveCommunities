<?php global $path, $session, $user; 

/*
 All Emoncms code is released under the GNU Affero General Public License.
 See COPYRIGHT.txt and LICENSE.txt.

 ---------------------------------------------------------------------
 Emoncms - open source energy visualisation
 Part of the OpenEnergyMonitor project:
 http://openenergymonitor.org
 */

// no direct access
defined('EMONCMS_EXEC') or die('Restricted access');

class Devices
{
    private $mysqli;
    private $input;
    private $redis;
    private $feed;
    private $process;
    
    public function __construct($mysqli,$redis,$input, $feed, $process)
    {
        $this->mysqli = $mysqli;
        $this->input = $input;
        $this->redis = $redis;
        $this->feed = $feed;
        $this->process = $process;
     
    }

    
    public function exists($deviceid)
    {
      $deviceid = (int) $deviceid;
      $result = $this->mysqli->query("SELECT deviceid FROM devices WHERE `deviceid` = '$deviceid'");
      if ($result->num_rows > 0) return true; else return false;
    }
    
    
    public function belongs_to_user( $userid, $deviceid)
    {
        $userid = (int) $userid;
        $deviceid = (int) $deviceid;

        $result = $this->mysqli->query("SELECT deviceid FROM devices WHERE userid = '$userid' AND deviceid = '$deviceid'");
        if ($result->fetch_array()) return true; else return false;
    }
    
	public function add_template($userid, $productName, $productType, $operatingType, $requiredNodeTypes, $modes)
	{
		
		$requiredNodeTypes = implode(',', $requiredNodeTypes);
		$modes = array_unique($modes);
		
		 $this->mysqli->query("INSERT INTO templates (productName, productType, operatingType, requiredNodeTypes, userid) VALUES ('".$this->mysqli->real_escape_string($productName)."', '".$this->mysqli->real_escape_string($productType)."', '".$this->mysqli->real_escape_string($operatingType)."', '".$this->mysqli->real_escape_string($requiredNodeTypes)."', $userid)");
		 $templateid= $this->mysqli->insert_id;
		 
		 foreach ($modes as $mode) {
			 $this->mysqli->query("INSERT INTO templates_modes (templateid, modeName) VALUES ($templateid, '".$this->mysqli->real_escape_string($mode)."')");
		 }
		
		return array('success'=>true, 'templateid'=>$templateid);
		
	}
	
	public function remove_template($userid, $templateid) {
		if (!is_numeric($templateid)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$qresult = $this->mysqli->query("SELECT deviceid FROM devices WHERE templateid = $templateid");
		if ($qresult->num_rows > 0) return array('success'=>false, 'message'=>'Template is currently assigned to a device');
		
		$this->mysqli->query("DELETE FROM templates WHERE userid = $userid AND templateid = $templateid");
		if ($this->mysqli->affected_rows == 1) {
			$this->mysqli->query("DELETE FROM templates_modes WHERE templateid = $templateid");
			
			return array('success'=>true, 'message'=>'Template deleted');
        } else {
            return array('success'=>false, 'message'=>'Template does not exist or insufficient permissions');
		}
	}
		
	public function list_templates($userid) {
		$qresult = $this->mysqli->query("SELECT * FROM templates");
		
		$templates = array();
		while($row=$qresult->fetch_object()) {
			$row->id = $row->templateid;
			$templates[] = $row;
			 
			 
		}
		
		return $templates;
	}
	
	public function register_node($userid, $driverid, $address, $type)
    {
		$node = $this->get_nodeid($userid, $driverid, $address);
		if ($node['success']) return array('success'=>false, 'message'=>'Node is already registered');
		
		 $this->mysqli->query("INSERT INTO node_parameters (type, driverid, address, userid) VALUES ('".implode(',', $type)."', '".$this->mysqli->real_escape_string($driverid)."', '".$this->mysqli->real_escape_string($address)."', $userid)");
		 $nodeid= $this->mysqli->insert_id;
		
		foreach ($type as $t) {
			if ($t == 'controller') $t = 'status';
			$this->input->create_input($userid, $nodeid, $t);
		}
		
		return array('success'=>true, 'nodeid'=>$nodeid, 'message'=>'Node successfully registered');
		
	}
	
	public function unregister_node($userid, $nodeid)
    {
		if (!is_numeric($nodeid)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$qresult = $this->mysqli->query("SELECT deviceid FROM devices_nodes WHERE nodeid = $nodeid");
		if ($qresult->num_rows > 0) return array('success'=>false, 'message'=>'Node is currently assigned to a device');
		
		$this->mysqli->query("DELETE FROM node_parameters WHERE userid = $userid AND nodeid = $nodeid");
		
		if ($this->mysqli->affected_rows == 1) {
			return array('success'=>true, 'message'=>'Node unregistered');
		}
		else {
			return array('success'=>false, 'message'=>'Node does not exist');
		}
	}
	
	public function get_nodeid($userid, $driverid, $address) {
		
		$qresult = $this->mysqli->query("SELECT * FROM node_parameters WHERE userid = $userid AND driverid = '".$this->mysqli->real_escape_string($driverid)."' AND address = '".$this->mysqli->real_escape_string($address)."'");
		
		if ($qresult->num_rows == 0) return array('success'=>false, 'message'=>'No matching node');
		
		$node = $qresult->fetch_object();
		
		return array('success'=>true, 'nodeid'=>intval($node->nodeid));
		
	}
		
	public function get_unassigned_nodes($userid, $type = false) {
		
		if ($type) {
			$sql = "";
			foreach ($type as $t) $sql.= " AND FIND_IN_SET('".$this->mysqli->real_escape_string($t)."', p.type) > 0";
		}
		
		$qresult = $this->mysqli->query("SELECT p.nodeid, p.type, p.address FROM node_parameters p LEFT JOIN devices_nodes n ON n.userid = $userid AND n.nodeid = p.nodeid WHERE p.userid = $userid".($type ? $sql : "")." GROUP BY p.nodeid HAVING COUNT(n.nodeid) = 0");
		
		$nodes = array();
		while($row=$qresult->fetch_object()) {
			$row->type =explode(',', $row->type);
			$nodes[] = $row;
			 
			 
		}
		
		return $nodes;
	}
	
	public function add_device($userid, $name, $templateid, $nodes) {
		if (!is_numeric($templateid)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$qresult = $this->mysqli->query("SELECT requiredNodeTypes FROM templates WHERE templateid = $templateid AND $userid = $userid");
		$template = $qresult->fetch_object();
		$requiredNodeTypes = explode(',', $template->requiredNodeTypes);
		
		$qresult = $this->mysqli->query("SELECT nodeid, type FROM node_parameters WHERE $userid = $userid AND FIND_IN_SET(nodeid, '".$this->mysqli->real_escape_string(implode(',', $nodes))."') > 0");
		$selectedNodeTypes = Array();
		$selectedNodes = Array();
		while ($node = $qresult->fetch_object()) {
			$selectedNodeTypes = array_merge($selectedNodeTypes, explode(',', $node->type));
			$selectedNodes[$node->nodeid] = explode(',', $node->type);
			
			if ($this->get_device_by_nodeid($userid, $node->nodeid)) {
				return array('success'=>false, 'message'=>'Node '.$node->nodeid.' is already assigned to a device');
			}
		}
		
		$selectedNodeTypes = array_unique($selectedNodeTypes);
		
		if (count($diff = array_diff($requiredNodeTypes, $selectedNodeTypes))) {
			return array('success'=>false, 'message'=>'No nodes selected for '.implode(", ", $diff));
		}
		else {
			$this->mysqli->query("INSERT INTO devices (name, templateid, userid) VALUES ('".$this->mysqli->real_escape_string($name)."', $templateid, $userid)");
			$deviceid= $this->mysqli->insert_id;
			
			$feedid = Array();
			
			if (in_array('energyIn', $selectedNodeTypes)) {
				$feedid['energyIn_kwh'] = $this->feed->create($userid, 'device'.$deviceid.'_in_kwh', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
				$feedid['energyIn_power'] = $this->feed->create($userid, 'device'.$deviceid.'_in_power', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
				$feedid['energyIn_kwhd'] = $this->feed->create($userid, 'device'.$deviceid.'_in_kwhd', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
			}
			if (in_array('energyOut', $selectedNodeTypes)) {
				$feedid['energyOut_kwh'] = $this->feed->create($userid, 'device'.$deviceid.'_out_kwh', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
				$feedid['energyOut_power'] = $this->feed->create($userid, 'device'.$deviceid.'_out_power', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
				$feedid['energyOut_kwhd'] = $this->feed->create($userid, 'device'.$deviceid.'_out_kwhd', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
			}
			if (in_array('temperature', $selectedNodeTypes)) {
				$feedid['temperature'] = $this->feed->create($userid, 'device'.$deviceid.'_temperature', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
			}
			if (in_array('controller', $selectedNodeTypes)) {
				$feedid['status'] = $this->feed->create($userid, 'device'.$deviceid.'_status', DataType::REALTIME, Engine::PHPTIMESERIES, false)['feedid'];
			}
			
			while ($node = each($selectedNodes)) {
				$this->mysqli->query("INSERT INTO devices_nodes (userid, deviceid, nodeid) VALUES ($userid, $deviceid, ".$node['key'].")");
				
				$inputs = $this->input->get_inputs($userid);
				$inputs = $inputs[$node['key']];
				
				if (in_array('energyIn', $node['value'])) {
					$this->input->add_process($this->process, $userid, $inputs['energyIn']['id'], 1, $feedid['energyIn_kwh']);
					$this->input->add_process($this->process, $userid, $inputs['energyIn']['id'], 21, $feedid['energyIn_power']);
					$this->input->add_process($this->process, $userid, $inputs['energyIn']['id'], 5, $feedid['energyIn_kwhd']);
				}
				if (in_array('energyOut', $node['value'])) {
					$this->input->add_process($this->process, $userid, $inputs['energyOut']['id'], 1, $feedid['energyOut_kwh']);
					$this->input->add_process($this->process, $userid, $inputs['energyOut']['id'], 21, $feedid['energyOut_power']);
					$this->input->add_process($this->process, $userid, $inputs['energyOut']['id'], 5, $feedid['energyOut_kwhd']);
				}
				if (in_array('temperature', $node['value'])) {
					$this->input->add_process($this->process, $userid, $inputs['temperature']['id'], 1, $feedid['temperature']);
				}
				if (in_array('controller', $node['value'])) {
					$this->input->add_process($this->process, $userid, $inputs['status']['id'], 1, $feedid['status']);
				}
			}
			
			return array('success'=>true, 'deviceid'=>$deviceid, 'message'=>'Device successfully added');
		}
	}
	
	public function get_device_by_nodeid($userid, $nodeid) {
		if (!is_numeric($nodeid)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$qresult = $this->mysqli->query("SELECT deviceid FROM devices_nodes WHERE userid = $userid AND nodeid = $nodeid");
		
		if ($qresult->num_rows == 0) return false;
		
		$device = $qresult->fetch_object();
		
		return array('success'=>true, 'deviceid'=>intval($device->deviceid));
	}
	
	public function remove_device($userid, $deviceid) {
		if (!is_numeric($deviceid)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$this->mysqli->query("DELETE FROM devices WHERE userid = $userid AND deviceid = $deviceid");
		if ($this->mysqli->affected_rows == 1) {
			
			$qresult = $this->mysqli->query("SELECT nodeid FROM devices_nodes WHERE userid = $userid AND deviceid = $deviceid");
			$inputs = $this->input->get_inputs($userid);
			
			while ($node = $qresult->fetch_object()) {
				foreach ($inputs[$node->nodeid] as $i) {
					$this->input->reset_process($i['id']);
				}
			}
			$this->mysqli->query("DELETE FROM devices_nodes WHERE userid = $userid AND deviceid = $deviceid");
			
			return array('success'=>true, 'message'=>'Device deleted');
        } else {
            return array('success'=>false, 'message'=>'Device does not exist or insufficient permissions');
		}
	}
		
	public function list_devices($userid) {
		$qresult = $this->mysqli->query("SELECT d.deviceid, d.name, p.nodeid AS controller FROM devices d LEFT JOIN devices_nodes n ON n.userid = $userid AND n.deviceid = d.deviceid LEFT JOIN node_parameters p ON p.nodeid = n.nodeid AND FIND_IN_SET('controller', p.type) > 0 GROUP BY deviceid ORDER BY name ASC");
		
		$inputs = $this->input->get_inputs($userid);
		
		$devices = array();
		while($row=$qresult->fetch_object()) {
			
			if (is_numeric($row->controller) and in_array($row->controller, $inputs)) {
				$row->status = $this->input->get_last_value($inputs[$row->controller]['status']['id']);
			}
			else {
				$row->status = -1;
			}
			
			$row->id = $row->deviceid;
			$devices[] = $row;
			 
			 
		}
		
		return $devices;
	}
	
	public function set_device_status($userid, $deviceid, $status) {
		if (!$this->belongs_to_user($userid, $deviceid)) return array('success'=>false, 'message'=>'Insufficient permissions');
		
		$qresult = $this->mysqli->query("SELECT p.address, p.driverid FROM node_parameters p LEFT JOIN devices_nodes n ON n.userid = $userid AND p.nodeid = n.nodeid WHERE n.deviceid = $deviceid AND FIND_IN_SET('controller', p.type) > 0");
		echo $this->mysqli->error;
		while ($row = $qresult->fetch_object()) {
			$cmd = Array('address' => $row->address, 'status' => $status);
			include('Modules/devices/'.$row->driverid.'/cmd.php');
		}
		
		return array('success'=>true);
	}
	
	public function post_value($userid, $driverid, $address, $type, $value, $time) {
		if (!is_numeric($value) or !is_numeric($time)) return array('success'=>false, 'message'=>'Invalid input parameter');
		
		$mtype = ($type == 'status') ? 'controller' : $type;
		
		$qresult = $this->mysqli->query("SELECT nodeid FROM node_parameters WHERE userid = $userid AND driverid = '".$this->mysqli->real_escape_string($driverid)."' AND address = '".$this->mysqli->real_escape_string($address)."' AND FIND_IN_SET('".$this->mysqli->real_escape_string($mtype)."', type) > 0");
		
		if ($qresult->num_rows == 0) {
			return array('success'=>false);
		}
		
		$node = $qresult->fetch_object();
		$inputs = $this->input->get_inputs($userid);
		
		$this->input->set_timevalue($inputs[$node->nodeid][$type]['id'], $time, $value);
		if ($inputs[$node->nodeid][$type]['processList']) $this->process->input($time, $value, $inputs[$node->nodeid][$type]['processList']);
		
		return array('success'=>true);
	}
    
}
