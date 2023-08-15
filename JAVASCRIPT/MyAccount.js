class CurrentDate {
    showDate() {  
        let date = new Date();
        let displayDate = document.getElementById("dynamic-date");
        displayDate.innerHTML = "On Date : " + date.toDateString();
    }
}

class DynamicProgressBar {
    showProgress() {
        let circularProgress = document.querySelector(".circular-progress") ,
        progressValue = document.querySelector(".progress-value");
    
        let progressStartValue = 0,
            progressEndValue = 100,
            speed = 50;
        
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
}

const dateObj = new CurrentDate();
dateObj.showDate();

const progressObj = new DynamicProgressBar();
progressObj.showProgress();

