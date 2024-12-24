const QuestionNumBox = ({answers, flags, questions, setQuestionIndex, onQuestionChange}) => {
    return(    
        <div className="row p-2 overflow-y-scroll h-96">
            <div className="grid grid-cols-5 gap-4 text-center">
                {questions ? Object.values(questions).map((question, index) => {
                    let $bgcolor = 'bg-neutral-300';
                    if(answers.has(question.questions.id)!=false){
                        switch(answers.get(question.id)){
                            case "":
                                $bgcolor = 'bg-neutral-300';
                                break;
                            default:
                                $bgcolor = 'bg-green-500';
                                break;
                        }
                    }
                    if(flags.get(index+1)) $bgcolor = 'bg-yellow-600';
                    return(
                        <button onClick={ function(event){
                            onQuestionChange();
                            setQuestionIndex(index+1);
                        }
                        }className={`rounded-md p-4 shadow-md ${$bgcolor}`}>
                            {index+1}
                        </button>
                    )
                }) : ""}
            </div>
        </div>
    )
}

export default QuestionNumBox