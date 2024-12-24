import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function TextInput({ type = 'text', className = '', isFocused = false, ...props }, ref) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <input
                {...props}
                type={type}
                className={
                    'border-[#9A9A9A] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm placeholder:text-[#A5A5A5] ' +
                    className
                }
                ref={input}
            />
        </div>
    );
});
