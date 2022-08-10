const reorderItems = (arr, from, to) => {
  let numberOfDeletedField = 1;
  const arrToBeReordered = [...arr];
  const field = arrToBeReordered.splice(from, numberOfDeletedField)[0];
  numberOfDeletedField = 0;
  arrToBeReordered.splice(to, numberOfDeletedField, field);
  return arrToBeReordered;
};

export { reorderItems };
