import React from 'react';

const Banner = ({ title, subtitle, btnContent, urlBtn }) => {
    const imageUrl = '/assets/images/error-404.png';
    return (
        <div style={{ padding: '5rem' }}>
            <div style={{ backgroundColor: 'white', boxShadow: "0px 0px 10px rgba(0, 0, 0, 0.3)", borderRadius: '20px', padding: '2rem' }}>
                <div style={{ display: 'flex', flexWrap: 'wrap' }}>
                    <div style={{ flex: '1', flexBasis: '40%' }}>
                        <img src={imageUrl} style={{ width: '70%' }} alt="" />
                    </div>
                    <div style={{ flex: '1', flexBasis: '60%', marginTop: '1rem' }}>
                        <p style={{ color: '#3E6D81', paddingTop: '5rem', fontSize: '2.5rem' }}>
                            <b>
                                <span style={{ color: '#CA6035' }}>OOPS,</span> {title}
                            </b>
                        </p>
                        <p style={{ fontSize: '1.5rem', marginTop: '0.5rem' }}>
                            {subtitle}
                        </p>
                        <a href={urlBtn} style={{ display: 'inline-block', textAlign: 'center' }}>
                            <button style={{ fontSize: '1.2rem', marginTop: '2rem', padding: '0.5rem 1rem', borderRadius: '7px', backgroundColor: '#3E6D81', color: 'white', border: 'none' }}>
                                {btnContent}
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Banner;
