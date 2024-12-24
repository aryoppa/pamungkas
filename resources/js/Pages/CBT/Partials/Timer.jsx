import React, {useEffect, useState} from 'react';


import {useTimer} from 'react-timer-hook';

const Timer = ({expiryTimestamp, onSubmit}) => {
    const {
        totalSeconds,
        seconds,
        minutes,
        hours,
        days,
        isRunning,
        start,
        pause,
        resume,
        restart
    } = useTimer({
        expiryTimestamp,
        onExpire: onSubmit
    });
    
    const [time, setTime] = useState(0);
    useEffect(() => {
        const interval = setInterval(() => {
          setTime(time => time + 1);
        }, 1000);
      
        return () => clearInterval(interval);
      }, []);
      
      useEffect(() => {
        sessionStorage.setItem('elapsedTime', time);
      }, [time]);
      

    return (
        <div> 
            <h1 className="text-5xl text-white">
                {hours} : {minutes} : {seconds}
                {/* {hours} Hour(s): {minutes} Minute(s) : {seconds} Second(s) */}
            </h1>
        </div>
    )
}
export default Timer;
