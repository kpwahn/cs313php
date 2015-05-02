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

            // route for the about page
            .when('/about', {
                templateUrl : 'research.html',
                controller  : 'aboutController'
            })

            // route for the contact page
            .when('/contact', {
              templateUrl : 'contact.html',
              controller  : 'contactController'
            })
      
            .when('/editing', {
              templateUrl : 'editing.html',
              controller  : 'editingController'
            })
        
            .when('/portfolio', {
                templateUrl : 'creativeWriting.html',
                controller  : 'portfolioController'
            });
                  
    });

    // create the controller and inject Angular's $scope
    professionalWriting.controller('mainController', function($scope) {
        // create a message to display in our view
        $scope.person = kendall;
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
  aboutMe: 'Hi! My name is Jenny Johnson and I am a Professional Writing major at University. I have a broad range of experience in the English world--ranging from writing in-depth research papers in strict format to creative writing in blog or magazine formats. Please take time to explore what examples I have available here with creative writing or here with research I\'ve completed.',
  images: ["http://static.wixstatic.com/media/59b675b3f18f47c987630c958da74b7e.jpg_srb_p_923_615_75_22_0.50_1.20_0.00_jpg_srb", "http://static.wixstatic.com/media/26f1ce540f44a0b1a35e5aaef62e6b10.jpg_srb_p_923_615_75_22_0.50_1.20_0.00_jpg_srb",
"http://static.wixstatic.com/media/e5433a67390ddeb83e13ebda5ddade7d.jpg_srb_p_600_615_75_22_0.50_1.20_0.00_jpg_srb", "http://static.wixstatic.com/media/66392d9d5a674e37c475dc759f7faff3.jpg_srb_p_800_536_75_22_0.50_1.20_0.00_jpg_srb", "http://static.wixstatic.com/media/ce01f31267b02b72581a6d5fa8701743.jpg_srb_p_856_571_75_22_0.50_1.20_0.00_jpg_srb", "http://static.wixstatic.com/media/0f57ebedd9c645d4ae40ca827216ed66.jpg_srb_p_857_571_75_22_0.50_1.20_0.00_jpg_srb",
"http://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg", "http://www.viralnovelty.net/wp-content/uploads/2014/07/121.jpg", "http://stylonica.com/wp-content/uploads/2014/02/nature.jpg","http://img.wikinut.com/img/3r2wx5cgt8jj06eq/jpeg/0/Nature.jpeg",],
  }

})(); // close enclosure
