import React, { useRef } from 'react';
import ChildComponent from './ChildComponent';

function ParentComponent() {
  const childRefs = {
    child1: useRef(null),
    child2: useRef(null),
  };

  const validateChildForms = () => {
    const child1Validation = childRefs.child1.current.validateForm();
    const child2Validation = childRefs.child2.current.validateForm();

    // Check validation status for both child components and take appropriate action
    if (child1Validation && child2Validation) {
      // Both forms are valid; proceed with submission.
    } else {
      // Handle invalid forms, display an error message, or prevent submission.
    }
  };

  return (
    <div>
      <ChildComponent ref={childRefs.child1} />
      <ChildComponent ref={childRefs.child2} />
      <button onClick={validateChildForms}>Save</button>
    </div>
  );
}

export default ParentComponent;




import React, { useRef, useImperativeHandle } from 'react';

function ChildComponent(props, ref) {
  const formRef = useRef(null);

  // Forward the `validateForm` function to the parent
  useImperativeHandle(ref, () => ({
    validateForm: () => {
      // Implement your form validation logic
      // Return true if the form is valid, false otherwise
      const isFormValid = formRef.current.validate();
      return isFormValid;
    },
  }));

  return (
    <form ref={formRef}>
      {/* Your form inputs */}
    </form>
  );
}

export default React.forwardRef(ChildComponent);
