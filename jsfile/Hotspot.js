/**
* Created with Hotspot.
* User: jcobb
* Date: 2016-02-09
* Time: 09:05 PM
* To change this template use Tools | Templates.
*/
db.admin.remove({})
db.admin.insert({
    "name" : {
        "first" : "Jonathan",
        "last" : "Cobb",
    },
    "login": {
    "username" : "jonna_cobb@yahoo.com",
    "password" : "hotkid103"
    }
    
});
db.socialyte.remove({})
db.socialyte.insert({
        "User ID" : "JCobb904",
        "first name" : "Jonathan",
        "last name" : "Cobb",
        "login" : {
            "email" : "jonna_cobb@yahoo.com",
            "password" : "Superman3"
        },
        "location" : { 
        "city" : "Tallahassee",
        "state" : "Florida",
        "zip code" : "32301"
        },
        "race" : "African American",
        "gender" : "Male",
        "birthday" : ""
      
});


db.events.remove({})
 db.events.insert ({
                "created time" :new Date('Sep 04, 1927'),
                "event organizer" : "JCobb904",
                "name" : "Kiki's 25th Birthday bash",
                "invitation" : "open-invitation",
                "location" : {
                               "address" : "1105 E Lafayette St",
                               "city" : "Tallahassee",
                               "state" : "Florida"
                             },
                "music" : "Rap",
                "cost" : 25,
                "food" : "seafood",
                "date" : "",
                "groups" :["Famu students"],
                "time" : "10 pm",
                "drinks" : "Vodka",
                "attire" : "casual",
                "Flames" : 5,
                "Flamers" : [],
               "attendence" : 50,
               "attending" : ["JCobb904","DC"],
               "comments" : [
                   { "commenter" : "Lucious_Lion",
                      "comments" : "That party gonna be live"
                   }]
});
 
db.events.insert ({
                "created time" :new Date('Sep 04, 1927'),
                "event organizer" : "Lucious_Lion",
                "name" : "Peanut Coming home party",
                "invitation" : "open-invitation",
                "location" : {
                               "address" : "6830 Miss Muffet ln",
                               "city" : "Jacksonville",
                               "state" : "Florida"
                             },
                "music" : "Rap",
                "cost" : 25,
                "food" : "seafood",
                "date" : "",
                "groups" : ["Family & friends"],            
                "time" : "10 pm",
                "drinks" : "40 ounces",
                "attire" : "casual",
                "attendence" : 50,
                "attending" : [],
                "Flames" : 0,
                "Flamers" : [],
                "comments" : [
                     { "commenter" : "Lucious_Lion",
                      "comments" : "That party gonna be live"
                   }]
}) ;  
db.message.remove({})
db.message.insert({
    "Recipients":["JCobb904","DC"],
    "content" : [{
    "from" : "DC",
    "to" : "JCobb904",
    "time sent" : "10:00 am",
    "message" : "Hey are you going to the party"}]

})
db.groups.remove({})
db.groups.insert({
                   "name":"Famu students",
                    "creator" : "JCobb904",
                    "members" : ["JCobb904"]
                });
db.announcements.remove({})
db.announcements.insert({
    "type" :  "MyEvents",
    "about" : "event",
    "recipient" : ["JCobb904"],
    "message" : "Event has been flamed",
    "pertaining" : "56fd4193ab989c8ba541f60c",
    "time received" : ""
})

db.announcements.insert({
    "type" :  "Activity",
    "about" : "matchbox",
    "recipient" : ["JCobb904"],
    "message" : "You have been added to a matchbox",
    "pertaining" : "56fd25acab989c8ba541f606",
    "time received" : ""
})
