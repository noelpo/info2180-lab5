document.addEventListener('DOMContentLoaded', function(){
    var button = document.getElementById("lookup");
    var new_button = document.getElementById("lookup-city");
    var url = 'http://localhost/info2180-lab5/world.php'
    var key = document.getElementById("country").value;
    

    button.addEventListener('click', (event) => {
        event.preventDefault();        
        httpR = new XMLHttpRequest();
        
        httpR.onreadystatechange = function(){
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                var r = httpR.responseText;
                var key = document.getElementById("country").value;
                
                document.getElementById("result").innerHTML = r;
            }
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                alert('ERROR - File not found.');
            }
        }
        httpR.open('GET', "http://localhost/info2180-lab5/world.php?country="+key, true);
        httpR.send();
    });  
     
    
    new_button.addEventListener('click', (event) => {
        event.preventDefault();        
        httpR = new XMLHttpRequest();
        
        httpR.onreadystatechange = function(){
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                var r = httpR.responseText;
                var key = document.getElementById("country").value;
                
                document.getElementById("result").innerHTML = r;
            }
            if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                alert('ERROR - File not found.');
            }
        }
        httpR.open('GET', "http://localhost/info2180-lab5/world.php?country="+key+"context=cities", true);
        httpR.send();
        
    });
    
    
});