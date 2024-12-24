import React from 'react'

export default function ButtonCBT(index, isFilled) {
    const[backgroundColor, setBackgroundColor] = useState("white")
    useEffect( () => {
        setBackgroundColor(
            answers.has(index)? "green" : "white"
        )
    },[isFilled])
  return (
    <button style={{backgroundColor: backgroundColor, boxShadow: '0px 0px 5px grey'}} className="rounded-md p-4">
        {index+1}
    </button>
  )
}
