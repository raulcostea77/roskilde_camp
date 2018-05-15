import $ from 'jquery';

const COUNTDOWN = 5;

export default class B2B {

    constructor() {
        $('#start').on('click', e => {
            this.startGame();   
        })
    }

    removeQuestion(questionToRemove) {
        for (var i=questions.length-1; i>=0; i--) {
            if (questions[i] === questionToRemove) {
                questions.splice(i, 1);
            }
        }
    }

    getRandomQuestion() {
        return questions[Math.floor(Math.random()*questions.length)];
    }

    startGame() {
        
        $('#start').text('Next Question');
        
        let randomItem = this.getRandomQuestion();
        this.removeQuestion(randomItem);
        
        let countDown = COUNTDOWN;
        $('#timer').text(countDown);
        $('#questionHeader').text(randomItem);
        
        setTimeout(e => {
            let hack = setInterval(f => {
                if ( countDown ) {
                    countDown--;
                    $('#timer').text(countDown);
                }
            },1000)

            $('#start').on('click', e => {
                clearInterval(hack);  
            })
            
        },3000)

        

    }

}
