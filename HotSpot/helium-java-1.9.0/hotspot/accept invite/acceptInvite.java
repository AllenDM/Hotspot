/**
 * This script uses Helium to edit an event.
 *
 */

import static com.heliumhq.API.*;
import java.util.*;
public class AcceptInvite {
    public static void main(String[] args) {
        startChrome();
        goTo("https://mirage-shelter-3000.codio.io/User/HotspotLogin.html");

        String email = "deepblue32@yahoo.com";

        String password = "Hotspot1";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Image("activity"));
        click(Link(toRightOf("You have an invitation"), toLeftOf("Decline")));
        if (Text("Accepted").exists())
            System.out.println("Test passed!");
        else
            System.out.println("Test failed :(");
        // killBrowser();


    }
}