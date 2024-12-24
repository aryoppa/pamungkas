import React from 'react';

const Modal = ({ isOpen, onSubmitModal, closeModal, message }) => {
    
    if (!isOpen) {
        return null;
    }

    return (
        <div style={{ position: "fixed", top: "0", left: "0", width: "100%", height: "100%", backgroundColor: "rgba(0, 0, 0, 0.5)", display: "flex", justifyContent: "center", alignItems: "center", zIndex: "1000" }}>
            <div style={{  backgroundColor: "#fff", width: "500px", padding: "25px", borderRadius: "8px", boxShadow: "0px 0px 10px rgba(0, 0, 0, 0.2)", textAlign: "center" }}>
                <p style={{ fontSize: "20px"}}>
                    {message}Apakah anda yakin ingin submit?
                </p>
                <button style={{ fontSize: "16px", margin: "5px", marginTop: "30px", padding: "10px 20px", border: "none", borderRadius: "5px", cursor: "pointer", backgroundColor: "#CA6035",  color: "#fff" }} onClick={closeModal}>
                    Batal
                </button>
                <button style={{  fontSize: "16px", margin: "5px", padding: "10px 20px", border: "none",  borderRadius: "5px", cursor: "pointer", ackgroundColor: "#ccc", backgroundColor: "#3E6D81", color: "#fff", }} onClick={onSubmitModal}>
                    Submit
                </button>
            </div>
        </div>
    );
};

export default Modal;
