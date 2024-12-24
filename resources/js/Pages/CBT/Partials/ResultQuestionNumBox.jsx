const ResultQuestionNumBox = ({flags, questions, setQuestionIndex}) => {
    return(    
        <div className="row p-2 overflow-y-scroll h-96">
            <div className="grid grid-cols-5 gap-4 text-center">
                {questions ? questions.map((question, index) => {
                    let $bgcolor = 'bg-green-600';
                    if(flags.get(question.question_id)=='0') $bgcolor = 'bg-red-600';
                    return(
                        <button onClick={ function(event){
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

export default ResultQuestionNumBox