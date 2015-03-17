package no.haktho.json.logic;

public class RealtimeFetcher extends Thread{

	Nodes nodes;
	long endTime, startTime;
	public RealtimeFetcher(Nodes nodes) {
		this.nodes = nodes;
	}
	
	public void run(){

		endTime = System.currentTimeMillis();
		
		if(startTime != 0){
			NodeHistoryFetcher nhf = new NodeHistoryFetcher(nodes, startTime, endTime);
			nhf.retrieveHistoryForNode();
			startTime = endTime;
		}
	
		startTime = endTime;
		
	}
	
}
