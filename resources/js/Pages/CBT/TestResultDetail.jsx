import {Link, Head} from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {useState} from 'react';
import Passage from './Partials/Passage';
import ResultQuestion from './Partials/ResultQuestion';
import ResultQuestionNumBox from './Partials/ResultQuestionNumBox';
import ResultBottomNav from './Partials/ResultBottomNav';


export default function Preview(props) {
    let answers = Array.from(
        props.answers
    )
    let questions = props.questions
    const [questionIndex, setQuestionIndex] = useState(1)
    const styles = {
        QuestionIdBox: {
            backgroundColor: "white",
            textAlign: "justify",
            boxShadow: "0px 0px 10px -2px"
        },
        QuestionId: {
            textAlign: "center"
        }
    }
    const onSubmit = () => {   
        return window.history.back();
    }

    return (
        <>
            <AuthenticatedLayout auth={
                    props.auth
                }
                errors={
                    props.errors
            }>
                <Head title="CBT"/>
                <div className="min-h-full">
                    <div className="bg-[#3e6d81] pb-32">
                        <header className="py-10">
                            <div className="mx-auto max-w-screen px-4 sm:px-6 lg:px-8">
                                <div className="flex justify-between">
                                <h1 className="text-5xl font-bold tracking-tight text-white">Test Result Detail</h1>
                                </div>
                            </div>
                        </header>   
                    </div>

                    <main className="-mt-32">
                        <div className="mx-auto max-w-screen px-4 pb-12 sm:px-6 lg:px-8">
                            {/* Replace with your content */}
                            <div className="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                                <div className="mx-auto p-8 mb-14">
                                    <div className="flex flex-row ">
                                        <div className="basis-2/3 p-5 mr-3 rounded-lg"
                                            style={
                                                {boxShadow: '0px 0px 8px grey'}
                                        }>
                                            <div className="row h-96 overflow-y-scroll">
                                                <style> {`
                                                    ::-webkit-scrollbar {
                                                        display: none;
                                                    }
                                                `} </style>
                                                <Passage title={
                                                        questions[questionIndex - 1].questions.passages['title']
                                                    }
                                                    passage={
                                                        questions[questionIndex - 1].questions.passages['passage']
                                                    }/>
                                            </div>
                                        </div>
                                        <div className="basis-1/3 p-5 ml-3 rounded-lg"
                                            style={
                                                {boxShadow: '0px 0px 8px grey'}
                                        }>
                                            <ResultQuestionNumBox questions={
                                                    questions
                                                }
                                                flags={new Map(answers.map(({ question_id, status }) => [question_id, status]))}
                                                setQuestionIndex={setQuestionIndex}/>
                                        </div>
                                    </div>
                                    <div className="row w-full mt-5">
                                        <div className="card p-5 w-full rounded-lg"
                                            style={
                                                {boxShadow: '0px 0px 8px grey'}
                                        }>
                                            <ResultQuestion 
                                                question={
                                                    questions[questionIndex - 1].questions
                                                }
                                                index={questionIndex}
                                                answer={questions[questionIndex - 1].questions.answer}
                                                user_answer={answers[questionIndex - 1]?.user_answer}
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div className="h-48">
                                        <ResultBottomNav questionIndex={questionIndex}
                                            length={
                                                questions.length
                                            }
                                            flags={questions.map(({ status }) => status)}
                                            onNext={
                                                () => {
                                                    setQuestionIndex(questionIndex + 1)
                                                }
                                            }
                                            onPrev={
                                                () => {
                                                    setQuestionIndex(questionIndex - 1)
                                                }
                                            }
                                            onSubmit={
                                                () => {
                                                    onSubmit()
                                                }
                                            }
                                            />
                                </div>
        </div>
        {/* /End replace */} </div>
</main></div></AuthenticatedLayout></>
    );
}
