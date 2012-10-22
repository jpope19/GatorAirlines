import java.io.*;
public class FlightGen()
{
    public static void main(String[]args) throws IOException
    {
        FileWriter fout = new FileWriter(new File("flights.txt"));
        for(int i = 0; i < 365; i++)
        {
            for(int j = 0; j < 50; j++)
            {
                int depTime = 1325376000 + i * 24*60*60 + (int)(Math.random()*24*60*60);
                fout.write((int)(Math.random()*5 + 1) + " " + (int)(Math.random()*5+1) + " " + (int)(Math.random()*5+1) + " " + depTime + " " + (depTime + 3600) + "\n");
            }
        }
     }
}