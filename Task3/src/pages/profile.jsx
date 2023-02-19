import React, { useEffect } from "react";
import { useNavigate } from "react-router-dom";

const Profile = () => {
  const navigate = useNavigate()
  useEffect(() => {
    if (localStorage.getItem('session') == 0) {
      navigate('/login');
    }
  }, []);
  return (
  <div>
    <h1>Привет, User!</h1>
  </div>);
};

export default Profile;
