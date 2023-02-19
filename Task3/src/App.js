import React, { useState } from "react";
import Index from "./pages/index";
import Articles from "./pages/articles";
import Profile from "./pages/profile";
import Login from "./pages/login";
import { Routes, Route } from "react-router-dom";
import Header from "./components/header";
import "./App.css";
import Footer from "./components/footer";

function App() {
  return (
    <div className="App">
      <Header />
      <main className="main">
          <Routes>
            <Route path="/" element={<Index />} />
            <Route path="/articles" element={<Articles />} />
            <Route path="/profile" element={<Profile />} />
            <Route path="/login" element={<Login />} />
          </Routes>        
      </main>
      <Footer/>
    </div>
  );
  }

export default App;
