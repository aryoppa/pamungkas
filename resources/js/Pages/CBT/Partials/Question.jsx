function UnsafeComponent({html}) {
    return <div dangerouslySetInnerHTML={
        {__html: html}
    }/>;
}

const Question = ({question, answer, onOptionChange, index}) => {
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
                        answer === "A"
                    }
                    onChange={onOptionChange}/>
                <label htmlFor="A">
                    &nbsp; {
                    "A. " + question.option1
                } </label>
                <br/>

                <input type="radio" name="option" value="B" id="B"
                    checked={
                        answer === "B"
                    }
                    onChange={onOptionChange}/>
                <label htmlFor="B">
                    &nbsp; {
                    "B. " + question.option2
                } </label>
                <br/>

                <input type="radio" name="option" value="C" id="C"
                    checked={
                        answer === "C"
                    }
                    onChange={onOptionChange}/>
                <label htmlFor="C">
                    &nbsp; {
                    "C. " + question.option3
                } </label>
                <br/>

                <input type="radio" name="option" value="D" id="D"
                    checked={
                        answer === "D"
                    }
                    onChange={onOptionChange}/>
                <label htmlFor="D">
                    &nbsp; {
                    "D. " + question.option4
                } </label>
                <br/>

                <p className="pt-2">
                    Answer:
                    <strong>{answer}</strong>
                </p>
            </> : <>
                <p className="pt-2">
                    Answer:
                </p>
                <textarea className="w-full h-32 p-2 border rounded-lg"
                    value={answer}
                    onChange={onOptionChange}/>
            </>
        } </>
    )
}

export default Question
