import java.net.*;
import java.io.*;
import java.nio.*;
import java.nio.channels.*;
import java.util.*;

public class temp
{// Hold user information for Server
  public static void main(String args[])
  {
    String fileName;
    File file;
    

    String[] table =
    {
      "Customer",
      "Airport",
      "Airplane",
      "Flight",
      "Ticket",
      "VIP"
    }; // end table

    String[] action =
    {
      "Validate",
    }; // end action

    int i = 0;
    int j = 0;
    while (i < 6)
    {
      while (j<1)
      {
        fileName = action[j]+table[i]+".js";
        file = new File(fileName);
        if (!file.exists())
        {// file does not exist, make it
          try
          {
            file.createNewFile();
          } // end try

          catch(IOException ioException)
          {
            ioException.printStackTrace();
          } // end catch
        } // end if

        else
        {// file exists
          file.delete();
          File newFile = new File(fileName);

          try
          {
            newFile.createNewFile();
          } // end try

          catch(IOException ioException)
          {
            ioException.printStackTrace();
          } // end catch
        } // end else

        j++;
      }// end while2
      j = 0;
      i++;
    }// end while1

  }// end create
}// end make