import React from "react";
import Post from "../components/post";

const Articles = () => {
  const posts = [
    {
      title: "HTML",
      body: "HTML is a hypertext markup language",
    },
    {
      title: "CSS",
      body: "CSS is a cascading style sheet language",
    },
    {
      title: "ReactJS",
      body: "React is a JavaScript library for creating external user interfaces",
    }
  ];
  return (
    <div className="post-list">
      {posts.map((post) => (
        <Post post={post} />
      ))}
      {posts.map((post) => (
        <Post post={post} />
      ))}
      {posts.map((post) => (
        <Post post={post} />
      ))}
    </div>
  );
};

export default Articles;
