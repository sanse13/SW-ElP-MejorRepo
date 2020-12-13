function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    console.log(auth2);
    auth2.signOut().then(function () {
    });
    auth2.disconnect();
}


function onSignIn(googleUser){
    var fd = new FormData();
    var profile = googleUser.getBasicProfile();
    
    var name = profile.getName();
    var imageUrl = profile.getImageUrl();
    var email = profile.getEmail();

    fd.append('name', name);
    fd.append('imageUrl', imageUrl);
    fd.append('email', email);

    console.log(name);
    console.log(email);
    
  
    $.ajax({

        url: '../php/GoogleUserInfo.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: true,
        type: 'POST',
        success: function(){
          signOut();
          window.location.href="Layout.php";
        }
    
    });

}


