import React from "react";

const Post = (props) => {
  return (
    <div className="post">
      <h3 className="post__title">{props.post.title}</h3>
      <p className="post__body">{props.post.body}</p>
    </div>
  );
};

export default Post;
