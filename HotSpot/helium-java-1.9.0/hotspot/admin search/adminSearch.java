/*
 * This script uses Helium to search for user accounts as the administrator.
 */

import static com.heliumhq.API.*;
import java.util.Scanner;
public class adminSearch {
    public static void main(String[] args) {
        startChrome();
        goTo("https://mirage-shelter-3000.codio.io/User/HotspotLogin.html");

        String email = "jonna_cobb@yahoo.com";

        String password = "hotkid103";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Link("Users"));
        write("Allen", into ("First name"));
        click(Button("Search"));
        if (Text("Allen").exists())
            System.out.println("Test passed!");
        else
            System.out.println("Test failed :(");
        // killBrowser();
    }
}
