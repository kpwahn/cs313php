(function() {
// create the module and name it scotchApp
        // also include ngRoute for all our routing needs
    var professionalWriting = angular.module('professionalWrittingSite', ['ngRoute',]);
  
    // configure our routes
    professionalWriting.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : 'home.html',
                controller  : 'mainController'
            })

            // route for the contact page
            .when('/contact', {
              templateUrl : 'contact.html',
              controller  : 'contactController'
            })
        
          .when('/assignments', {
                templateUrl : 'assignments.html',
                controller  : 'assignmentController'
            })
    });

    // create the controller and inject Angular's $scope
    professionalWriting.controller('mainController', function($scope) {
        // create a message to display in our view
        $scope.person = kendall;
      $scope.index = 0;
      
       $scope.changeIndex = function(index) {
    $scope.index = index;
    }
       
    });

  professionalWriting.controller('contactController', function($scope) {
    $scope.person = kendall;
  });
  
  var kendall = {
    name: 'Kendall Wahnschaffe',
    email : "kpwahnschaffe@gmail.com",
    phone: "503-863-9232",
    addressStreet: '149 Viking Drive',
    addressCity:'Rexburg,',
    addressState: 'Idaho',
    addressZip: '83440',
    contactPhoto: "https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/250910_2005251179815_5159739_n.jpg?oh=9a4581fb1ff4b1b4672d62532de8fdb5&oe=55CEDDF7",  
  profilePicture: 'https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/11160668_10206539659159108_3228286900737135980_n.jpg?oh=1b11e92a90c56f07a21047889b532d2f&oe=55E27154',
  images: ["https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/10629798_10204735791288975_2498423134215724734_n.jpg?oh=eac03cac849cdff72f879889242fa0c9&oe=55D01788", "https://scontent.xx.fbcdn.net/hphotos-xtf1/v/t1.0-9/1469866_10202466637936123_1276138258_n.jpg?oh=69f8c1ec0f6a95e27af82114e32c32df&oe=55CFE8F7", "https://scontent.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/10389561_10205467996248205_4561604276526168422_n.jpg?oh=e99d54e9103d38347dff784ac7197d40&oe=55D9E540",
"https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn2/v/t1.0-9/1395992_10202285447846484_1500203594_n.jpg?oh=8c7893bff6df0e3b2ef7e6768decfab9&oe=55DCC712&__gda__=1438955556_762d213ebe7327a38408829f5d022720", "https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash2/v/t1.0-9/1383487_10202087797505349_518600071_n.jpg?oh=17ae7223f9b2865038221a78c88e3e22&oe=55DD7B7B&__gda__=1440057524_7a0583e2a27cf7c8a2249c91655576fd", "https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/11160668_10206539659159108_3228286900737135980_n.jpg?oh=1b11e92a90c56f07a21047889b532d2f&oe=55E27154", "https://scontent.xx.fbcdn.net/hphotos-xpt1/v/t1.0-9/10981861_10205906147161704_6833491841592024541_n.jpg?oh=27e953f692f2eec48ceff6c3b2ffeb20&oe=55D23D25",
"https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/10599705_787965277963659_5156005805695111857_n.jpg?oh=aa76fd53551691b780f713f897d8e528&oe=55D44D55&__gda__=1440200255_a56ecaedfba4f2debc6cecb15aa0a4c2", "https://scontent.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/1959448_10201052465553798_6422538243289508056_n.jpg?oh=298887eeecb4c9ca3e60573f01ac0772&oe=55D0AE64","https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xft1/v/t1.0-9/1601070_10200558209957717_1146433326_n.jpg?oh=712f20514fd702323abb78564435ab68&oe=55C76001&__gda__=1440631923_5eaa1d7f10795e0d2c52954cd744a78b", "https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/10325728_10202779657226846_1256930715156140423_n.jpg?oh=7a4cda92c052eaef9a9075059393a01c&oe=55D68058"],
    index: 0,
  }

})(); // close enclosure
