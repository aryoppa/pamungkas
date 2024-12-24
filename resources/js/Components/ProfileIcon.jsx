import React from 'react';

function ProfileIcon() {
  return (
    <div className="profile-icon">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="50"
        height="50"
        viewBox="0 0 50 50"
      >
        <circle cx="25" cy="25" r="20" fill="#007bff" />
        <text
          x="50%"
          y="50%"
          textAnchor="middle"
          dy=".3em"
          fontSize="20"
          fill="#fff"
        >
          A
        </text>
      </svg>
    </div>
  );
}

export default ProfileIcon;
