/*
 * This script uses Helium to create a group.
 */

import static com.heliumhq.API.*;
import java.util.Scanner;
public class createGroup {
    public static void main(String[] args) {
        startChrome();
        goTo("https://mirage-shelter-3000.codio.io/User/HotspotLogin.html");

        String email = "deepblue32@yahoo.com";

        String password = "Hotspot1";
        write(email, into ("Email Address"));
        write(password, into("Password"));
        click("Login");
        click(Image("profile"));
        click(Link("Matchbox"));
        write("Hackers", into("name...."));
        press(ENTER);

        // killBrowser();
    }
}
