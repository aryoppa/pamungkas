const ResultBottomNav = ({
    questionIndex,
    length,
    onNext,
    onPrev,
    onSubmit,
}) => {
    return (
        <div className="fixed bottom-0 px-10 left-0 z-50 w-full h-16 bg-white border-t border-gray-200"
            style={
                {boxShadow: '0px 0px 8px grey'}
        }>
            <div className="flex flex-row mt-4">
                <div className="basis-1/2">
                    {
                    questionIndex != 1 ? <button onClick={onPrev}
                        className='p-1 rounded-md'
                        style={
                            {
                                width: "150px",
                                backgroundColor: "#3E6D81",
                                color: "white"
                            }
                    }>
                        Prev
                    </button> : ""
                } </div>
                <div className="basis-1/2">
                    {
                    questionIndex != length ? (
                        <button onClick={onNext}
                            className='p-1 rounded-md'
                            style={
                                {
                                    float: "right",
                                    width: "150px",
                                    backgroundColor: "#3E6D81",
                                    color: "white"
                                }
                        }>
                            Next
                        </button>
                    ) : (
                        <button onClick={onSubmit}
                            className='p-1 rounded-md'
                            style={
                                {
                                    float: "right",
                                    width: "150px",
                                    backgroundColor: "#3E6D81",
                                    color: "white"
                                }
                        }>
                            Selesai
                        </button>
                    )
                } </div>
            </div>
        </div>
    )
}

export default ResultBottomNav
