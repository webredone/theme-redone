import React, { useState } from 'react'

function ReactCounter() {
  const [count, setCount] = useState(0)
  return (
    <div>
      <h2>React Counter</h2>

      <h1>{count}</h1>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  )
}

export { ReactCounter }
