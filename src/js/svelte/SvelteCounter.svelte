<script>
	let count = 0;
</script>

<div>
  <h3>Svelte Counter</h3>
  <button on:click={() => count -= 1}>-</button>
  <span>{ count }</span>
  <button on:click={() => count += 1}>+</button>
</div>