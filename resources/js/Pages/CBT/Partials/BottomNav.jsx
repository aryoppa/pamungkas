const BottomNav = ({
    flags,
    questionIndex,
    length,
    onNext,
    onPrev,
    onSubmit,
    onFlag,
    onUnflag,
}) => {
    return (
        <div className="fixed bottom-0 px-10 left-0 z-50 w-full h-16 bg-white border-t border-gray-200"
            style={
                {boxShadow: '0px 0px 8px grey'}
        }>
            <div className="flex flex-row mt-4">
                <div className="basis-1/3">
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
                <div className="basis-1/3 flex">
                    {
                    flags.get(questionIndex) ? 
                    <button onClick={onUnflag}
                        className='p-1 rounded-md mx-auto bg-yellow-600'
                        style={
                            {
                                width: "150px",
                                color: "white"
                            }
                    }>
                        Sudah yakin
                    </button> 
                    : 
                    <button onClick={onFlag}
                        className='p-1 rounded-md mx-auto bg-yellow-600'
                        style={
                            {
                                width: "150px",
                                color: "white"
                            }
                    }>
                        Ragu-Ragu
                    </button>
                } </div>
                <div className="basis-1/3">
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
                            Submit
                        </button>
                    )
                } </div>
            </div>
        </div>
    )
}

export default BottomNav
