function taskComplete(button)
{
    postid=button.parentNode.getAttribute("data-postid");
    var xhttp=new XMLHttpRequest();
    xhttp.open("GET", "index.php?postid="+postid, true);
    xhttp.send();
    button.parentNode.remove();
}
fetch('get_data.php')
    .then(response => response.json())
    .then(data => {
        const currentDate = new Date();
        const expiredEntries = [];
       
      // Handle the retrieved data in JavaScript
      for(const entry of data){
        const datetime = new Date(entry.deadline);
        if(currentDate>datetime){
           expiredEntries.push(entry.postid);
        }
      }
      
    })
    .catch(error => {
      // Handle any errors
      console.error(error);
    });

//const odd = document.querySelectorAll('#parent :nth-child(odd)');