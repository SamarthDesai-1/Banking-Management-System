class CurrentDate {
    showDate() {  
        let date = new Date();
        let displayDate = document.getElementById("dynamic-date");
        displayDate.innerHTML = "On Date : " + date.toDateString();
    }
}

// class DynamicProgressBar {

    function showProgress() {

        let decodeCookie = decodeURIComponent(document.cookie);
        let ca = decodeCookie.split(";");
        let splitans = ca[0].split('=');
        let ans = splitans[1];
        let toINT = Number.parseInt(ans);

        let circularProgress = document.querySelector(".circular-progress") ,
        progressValue = document.querySelector(".progress-value");
    
        let progressStartValue = 0,
            progressEndValue = 61,
            speed = 50;
        
        console.log(progressEndValue);     
        console.log(toINT);     
        let progress = setInterval(() => {
            progressStartValue++;

            progressValue.textContent = `${progressStartValue}%`;
            circularProgress.style.background = `conic-gradient(#7d2ae8 ,${progressStartValue * 3.6}deg ,#ededed 0deg)`;

            if(progressStartValue == progressEndValue) {
                clearInterval(progress);
                
                let element = document.querySelector(".text");
                // element.innerHTML = `<input type="button" value="Submit">`;

            }
            console.log(progressStartValue);
        }, speed);

    }

// }


const dateObj = new CurrentDate();
dateObj.showDate();

// const progressObj = new DynamicProgressBar();
// progressObj.showProgress();

showProgress();


