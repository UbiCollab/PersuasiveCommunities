
var devices = {

  'list':function()
  {
    var result = {};
    $.ajax({ url: path+"devices/device/list.json", dataType: 'json', async: false, success: function(data) {result = data;} });
    return result;
  },

  'set':function(id, fields)
  {
    var result = {};
    $.ajax({ url: path+"driver/set.json", data: "parameterid="+id+"&fields="+JSON.stringify(fields), async: false, success: function(data){} });
    return result;
  },

  'remove':function(id)
  {
    $.ajax({ url: path+"devices/device/remove.json", data: "deviceid="+id, async: false, success: function(data){} });
  },

  // Process

  'add_process':function(inputid,processid,arg,newfeedname)
  {
    var result = {};
    $.ajax({ url: path+"drive/process/add.json", data: "inputid="+inputid+"&processid="+processid+"&arg="+arg+"&newfeedname="+newfeedname, async: false, success: function(data){result = data;} });
    return result;
  },

  'get_parameters':function(driverid)
  {
    var result = {};
    $.ajax({ url: path+"driver/parameters.json", data: "driverid="+driverid, async: false, dataType: 'json', success: function(data){result = data;} });
    return result;
  },

  'delete_process':function(inputid,processid)
  {
    var result = {};
    $.ajax({ url: path+"driver/process/delete.json", data: "inputid="+inputid+"&processid="+processid, async: false, success: function(data){result = data;} });
    return result;
  },

  'move_process':function(inputid,processid,moveby)
  {
    var result = {};
    $.ajax({ url: path+"driver/process/move.json", data: "inputid="+inputid+"&processid="+processid+"&moveby="+moveby, async: false, success: function(data){result = data;} });
    return result;
  },

  'reset_processlist':function(inputid,processid,moveby)
  {
    var result = {};
    $.ajax({ url: path+"driver/process/reset.json", data: "inputid="+inputid, async: false, success: function(data){result = data;} });
    return result;
  },
  'startstop':function(deviceid, status)
  {
     var result = {};
     $.ajax({ url: path+"devices/device/status.json", data: "deviceid="+deviceid+"&status="+status, dataType: 'json', async: false, success: function(data) {result = data;} });
     return result;
     
  }

}

