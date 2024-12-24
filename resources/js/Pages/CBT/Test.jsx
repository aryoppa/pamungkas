import {Head} from '@inertiajs/react';
import {Inertia} from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {useEffect, useState} from 'react';
import Passage from './Partials/Passage';
import Question from './Partials/Question';
import BottomNav from './Partials/BottomNav';
import QuestionNumBox from './Partials/QuestionNumBox';
import Timer from './Partials/Timer';
import Modal from './Partials/Modal';
import Banner from './Partials/Banner';
let answers = new Map()
const STORAGE_KEY = 'jawaban_user';

export default function Test(props) {
    console.log(props);
    let testEndDate = new Date(props.test.date + " " + props.test.end_time);
    let testStartDate = new Date(props.test.date + " " + props.test.start_time);

    let questions = props.questions
    const [answer, setAnswer] = useState()
    const [questionIndex, setQuestionIndex] = useState(1)
    const [flags, setFlags] = useState(new Map())
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [messegeModal, setMessegeModal] = useState('');

    useEffect(() => {
        const kumpulan_jawaban = new Map();
        const serializedData = localStorage.getItem(STORAGE_KEY);
        if (serializedData) {
            const arrayOfMaps = JSON.parse(serializedData);
            arrayOfMaps.forEach((pair) => {
                const [key, value] = pair;
                kumpulan_jawaban.set(key, value);
            });
        }
        answers = kumpulan_jawaban
    }, [])

    useEffect(() => {
        setAnswer(answers.has(questions[questionIndex - 1].questions.id) ? answers.get(questions[questionIndex - 1].questions.id) : '')
    }, [questionIndex])

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

    const onOptionChange = e => {
        setAnswer(e.target.value)
    }

    const saveToLocalStorage = () => {
        const jawabanMap = answers
        let kumpulan_jawaban = Array.from(jawabanMap)
        kumpulan_jawaban.sort((a, b) => a[0] - b[0])
        const parsed = JSON.stringify(kumpulan_jawaban)
        localStorage.setItem(STORAGE_KEY, parsed)
    }

    const onQuestionChange = () => {
        if (answer != '') 
            answers.set(questions[questionIndex - 1].questions.id, answer)
        saveToLocalStorage()
    }

    const onQuestionFlagged = () => {
        setFlags(new Map(flags.set(questionIndex, true)))
    }
    const onQuestionUnflagged = () => {
        flags.delete(questionIndex)
        setFlags(new Map(flags))
    }

    const onSubmit = () => {
        saveToLocalStorage()

        const data = Array.from(answers, function (entry) {
            return {key: entry[0], value: entry[1]}
        })

        const timeSpent = sessionStorage.getItem('elapsedTime');
        localStorage.removeItem(STORAGE_KEY);
        Inertia.post('/cbt/test/submit/' + props.test.code, {data, timeSpent})
    }

    const openModal = () => {
        checkSubmitMessage();
        setIsModalOpen(true);
    }

    const closeModal = () => setIsModalOpen(false);

    const checkSubmitMessage = () => {
        if (flags.size > 0) {
            setMessegeModal("Masih ada soal yang ragu-ragu. ")
            if (answers.size < Object.keys(questions).length) {
                setMessegeModal("Masih ada soal yang ragu-ragu dan belum dijawab. ")
            }
        } else if (answers.size < Object.keys(questions).length) {
            setMessegeModal("Masih ada soal yang belum dijawab. ")
        } else {
            setMessegeModal('');
        }
    }

    if (Date.now() < testStartDate || Date.now() > testEndDate) {
        return (
            <Banner title="Kamu tidak bisa akses tes ini" subtitle="Silahkan cek ulang jadwal tes yang telah diberikan oleh admin tes" btnContent="Kembali Ke Halaman Utama" urlBtn="/"/>
        );
    } else if (props ?. userResultID != null) {
        return (
            <Banner title="Kamu tidak bisa akses tes ini" subtitle="Kamu sudah pernah mengisi tes ini sebelumnya" btnContent="Kembali Ke Halaman Utama" urlBtn="/"/>
        );
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
                                    <h1 className="text-5xl font-bold tracking-tight text-white">{props.test.title}</h1>
                                    {/* adjust the text size and color here */}
                                    <Timer expiryTimestamp={testEndDate}
                                        onSubmit={
                                            () => onSubmit()
                                        }/>
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
                                                        questions[questionIndex - 1].questions.passages.title
                                                    }
                                                    passage={
                                                        questions[questionIndex - 1].questions.passages.passage
                                                    }/>
                                            </div>
                                        </div>
                                        <div className="basis-1/3 p-5 ml-3 rounded-lg"
                                            style={
                                                {boxShadow: '0px 0px 8px grey'}
                                        }>
                                            <QuestionNumBox questions={questions}
                                                flags={flags}
                                                answers={answers}
                                                onQuestionChange={onQuestionChange}
                                                setQuestionIndex={setQuestionIndex}/>
                                        </div>
                                    </div>
                                    <div className="row w-full mt-5">
                                        <div className="card p-5 w-full rounded-lg"
                                            style={
                                                {boxShadow: '0px 0px 8px grey'}
                                        }>
                                            <Question question={
                                                    questions[questionIndex - 1].questions
                                                }
                                                index={questionIndex}
                                                answer={answer}
                                                onOptionChange={onOptionChange}/>
                                        </div>
                                    </div>
                                </div>
                                <div className="h-48">
                                    <BottomNav questionIndex={questionIndex}
                                        length={
                                            Object.keys(questions).length
                                        }
                                        flags={flags}
                                        onNext={
                                            () => {
                                                onQuestionChange()
                                                setQuestionIndex(questionIndex + 1)
                                            }
                                        }
                                        onFlag={
                                            () => {
                                                onQuestionFlagged()
                                            }
                                        }
                                        onUnflag={
                                            () => {
                                                onQuestionUnflagged()
                                            }
                                        }
                                        onPrev={
                                            () => {
                                                onQuestionChange()
                                                setQuestionIndex(questionIndex - 1)
                                            }
                                        }
                                        onSubmit={
                                            () => {
                                                onQuestionChange()
                                                openModal()
                                            }
                                        }/>
                                </div>
        </div>
    </div>
    <Modal isOpen={isModalOpen}
        onSubmitModal={
            () => onSubmit()
        }
        message={messegeModal}
        closeModal={closeModal}/>
</main></div></AuthenticatedLayout></>
    );
}
