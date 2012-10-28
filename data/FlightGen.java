import java.io.*;
public class FlightGen {
    public static void main(String[]args) throws IOException {
    	FileWriter fout = new FileWriter(new File("flights.txt"));
        for(int i = 0; i < 70; i++) {
            for(int j = 2; j <= 50; j++) {
                int depTime = 1349049600 + i * 24*60*60 + (int)(Math.random()*12*60*60);
                createFlight(1,j, depTime, fout);
                depTime = 1349049600 + i * 24*60*60 + (int)(Math.random()*12*60*60);
                createFlight(j,1, depTime, fout);
                
                depTime = 1349049600 + i * 24*60*60 + 12*60*60 + (int)(Math.random()*12*60*60);
                createFlight(1,j, depTime, fout);
                depTime = 1349049600 + i * 24*60*60 + 12*60*60 + (int)(Math.random()*12*60*60);
                createFlight(j,1, depTime, fout);
            }
        }
     }
     
     public static void createFlight(int from, int to, int depTime, FileWriter fout) throws IOException {
     	System.out.print((int)(Math.random()*5 + 1) + " "+ 
        				from + " " + to + " " + 
        				(int)(1000*Math.random() + 200) + " " +
        				(int)(2000*Math.random() + 800) + " " +
        				depTime + " " + 
        				(int)(depTime + Math.random() * 5 * 3600 + 3600) + " " +
        				(int)(Math.random() * 1000 + 200) +
        				"\n");
    }
}
