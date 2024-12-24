import React, { useState, useEffect } from 'react';

function Stopwatch() {
  const [seconds, setSeconds] = useState(0);

  useEffect(() => {
    const interval = setInterval(() => {
      setSeconds(seconds => seconds + 1);
    }, 1000);

    return () => clearInterval(interval);
  }, []);

  useEffect(() => {
    // simpan elapsed time tiap ganti detiknya
    sessionStorage.setItem('elapsedTime', seconds);
  }, [seconds])

  const minutes = Math.floor(seconds / 60);
  const remainingSeconds = seconds % 60;

  return (
    // <div style={{ fontSize: "40px", color: "white" }}>
    //   {minutes} Minutes : {remainingSeconds} Seconds
    // </div>
    <div>
        
    </div>
  );
}

export default Stopwatch;
