/**
* Created with Hotspot.
* User: jcobb
* Date: 2016-02-14
* Time: 07:06 PM
* To change this template use Tools | Templates.
*/
// Retrieve
var MongoClient = require('mongodb').MongoClient;
var connected = false;
var express = require('express');
var router = express.Router();
// Connect to the db
MongoClient.connect("mongodb://localhost:mirage-shelter/Hotspot", function(err, db) {
  if(!err) {
    console.log("We are connected");
      connected = true;
      }
 else
     throw new Error('Could not connect' + err);}
   //Post                 
router.get('/User/HotspotLogin');

 router.post('/Register', function(req,res){
     var User = mongoose.model("userid",UserSchema);
     var userid = req.param("username");
     var first = req.param("first");
     var last = req.parem("last");
     var email = req.parem("email");
     var city = req.parem("city");
     var state = req.parem("state")
     var zipc = req.parem("zipcode");
     var pass = req.parem("password");
     var gender = req.parem("Gender");
     var month = req.parem("month");
     var day = req.parem("day");
     var year = req.parem("year");
     var race = req.parem("race");
     
     return res.redirect('/Register');
 })
 
 User.find({email: email; });
 module.exort = router;