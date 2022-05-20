const displayTime = () =>{
    let date = new Date();
    let day = date.getDate();
    let month = parseInt(date.getMonth()) + 1;
    let year = date.getFullYear();
    let hours = date.getHours();
    let minutes= date.getMinutes();
    let seconds = date.getSeconds();
    
    document.querySelector(".current-time").innerHTML = day + "/" +  month +"/" + year + " " +  hours + ":" + minutes + ":" + seconds;
    window.setTimeout(()=>{
        displayTime();
    },1000);
}

displayTime();


const getCurrentTime = () =>{
    let date = new Date();
    let day = date.getDate();
    let month = parseInt(date.getMonth()) + 1;
    let year = date.getFullYear();
    let hours = date.getHours();
    let minutes= date.getMinutes();
    let seconds = date.getSeconds();
    return day + "/" +  month +"/" + year + " " +  hours + ":" + minutes + ":" + seconds;
}


let count = 0;

if (count == 0){
    count++;
    document.querySelector(".current-visit-time").innerHTML = "This is your first-time visit to this page";
} else{
    localStorage.setItem("time", getCurrentTime())
    let time = localStorage.getItem("time");
    document.querySelector(".current-visit-time").innerHTML = time;
    count++;
}