function UnsafeComponent({html}) {
    return <div dangerouslySetInnerHTML={
        {__html: html}
    }/>;
}

const ResultQuestion = ({question, answer, user_answer, index}) => {
    return (
        <>
            <h3 className="pb-2">
                <UnsafeComponent html={
                    index + '. ' + question.question
                }/>
            </h3>
            {
            question.category != '5W+1H' ? <>
                <input type="radio" name="option" value="A" id="A"
                    checked={
                        user_answer === "A"
                    }
                    disabled/>
                <label htmlFor="A">
                    &nbsp; {
                    "A. " + question.option1
                } </label>
                <br/>

                <input type="radio" name="option" value="B" id="B"
                    checked={
                        user_answer === "B"
                    }
                    disabled/>
                <label htmlFor="B">
                    &nbsp; {
                    "B. " + question.option2
                } </label>
                <br/>

                <input type="radio" name="option" value="C" id="C"
                    checked={
                        user_answer === "C"
                    }
                    disabled/>
                <label htmlFor="C">
                    &nbsp; {
                    "C. " + question.option3
                } </label>
                <br/>

                <input type="radio" name="option" value="D" id="D"
                    checked={
                        user_answer === "D"
                    }
                    disabled/>
                <label htmlFor="D">
                    &nbsp; {
                    "D. " + question.option4
                } </label>
                <br/>

                <p className="pt-2">
                    Correct Answer:
                    <strong> {answer}</strong>
                </p>
            </> : <>
                <p className="pt-2">
                    Answer:
                </p>
                <textarea className="w-full h-32 p-2 border rounded-lg"
                    value={user_answer}/>
                <p className="pt-2">
                    Correct Answer:
                    <strong> {answer}</strong>
                </p>
            </>
        } </>
    )
}

export default ResultQuestion
