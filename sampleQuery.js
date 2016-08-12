/**
* Created with Hotspot.
* User: jcobb
* Date: 2016-02-09
* Time: 11:02 PM
* To change this template use Tools | Templates.
*/

/*1)	The administrator creates an account */
db.socialyte.insert({
    "User ID": "Hotspotmod",
    "first name": "Allen",
    "last name": "Moody",
    "admin": true
})

/* if asked to see admin files*/
 use admin
 db.users.find({},{"_id":0})
 db.eventlist.find({},{"_id":0})

 /*2)	An event coordinator edits an event(changes attire to formal from casual) */
 db.events.update({ "event organizer": {$eq: "JeffGordan223"} },
                  {$set: { "attire": "formal"   } }
                 )
/*2a  Check that change was made */
 db.events.find( {}, { "_id":0 } ).pretty()
 
/*3)	A SocialLyte searches for events */
db.events.find( {}, { "_id":0 } ).pretty()
/*4)	A guest views About App */
db.guest.find( {}, { "_id":0 } )
