// Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyDE77rxooD0Y8s7PkLj_vnKtAcR2zS-txo",
	    authDomain: "mafeking-trophy.firebaseapp.com",
	    databaseURL: "https://mafeking-trophy.firebaseio.com",
	    projectId: "mafeking-trophy",
	    storageBucket: "mafeking-trophy.appspot.com",
	    messagingSenderId: "680867369315"
	  };
	  firebase.initializeApp(config);


var db = firebase.firestore();
var obj
var ecrire =""
var epreuve = "epreuve1"

db.collection("epreuve")
                .where("epreuveID", "==",epreuve)
                .onSnapshot(function(snapshot) {
                    snapshot.forEach(function (userSnapshot) {
                        console.log(userSnapshot.data())
                        obj = userSnapshot.data()
                        document.getElementById("firestoreDonnee").innerHTML += obj.epreuveID + ", " + obj.temps + ", " + obj.equipeID + "<br><br>";
                    });
});
	
	 