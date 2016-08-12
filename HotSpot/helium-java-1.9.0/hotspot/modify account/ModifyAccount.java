/*
 * This script uses Helium to modify a user account as the administrator.
 */

import static com.heliumhq.API.*;
import java.util.Scanner;
public class ModifyAccount {
    public static void main(String[] args) {
        startChrome();
        goTo("https://mirage-shelter-3000.codio.io/User/HotspotLogin.html");

        String email = "jonna_cobb@yahoo.com";

        String password = "hotkid103";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Link("Users"));
        click(Link("deepblue"));
        write("All", into("first"));
        click("Update");
        if (Text("All").exists())
            System.out.println("Test passed!");
        else
            System.out.println("Test failed :(");
        // killBrowser();
    }
}
