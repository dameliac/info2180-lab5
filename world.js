window.onload = function Search(){
    let searchbtn = document.getElementById("lookup");
    let httpRequest;
    

    searchbtn.addEventListener('click', function(){
        console.log('form submitted');
        let input = document.getElementById('country');
        let data = input.value;
        console.log(data);
        httpRequest = new XMLHttpRequest(); //creating an XMLHttpRequest object.
        //GET Request
        httpRequest.onreadystatechange = loadData;
        httpRequest.open('GET', 'world.php?query='+data, true);
        httpRequest.send();

      
    });

    function loadData() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
          if (httpRequest.status === 200) {
            let response = httpRequest.responseText;
            let result = document.getElementById("result");
            result.innerHTML = response;
          } else {
            console.log(httpRequest.responseText);
            alert('There was a problem with the request.');
          }
        }
      }

}