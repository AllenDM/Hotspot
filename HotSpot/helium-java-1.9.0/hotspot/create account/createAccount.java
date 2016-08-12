
/**
 * This script uses Helium to send a message from one socialyte to another.
 * The script will also log into the reciever account to verify that the message
 * was sent.
 */

import static com.heliumhq.API.*;
import java.util.Scanner;
public class userLogin {
    public static void main(String[] args) {
        startChrome();
        goTo("https://finance-potato-3000.codio.io/User/HotspotLogin.html");

        String email = "jonna_cobb@yahoo.com";

        String password = "hotkid103";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Link("Users"));
        

        if (Image("Hotspot").exists())
            System.out.println("Test passed!");
        else
            System.out.println("Test failed :(");
        // killBrowser();
    }
}

