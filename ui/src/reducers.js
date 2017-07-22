
import {combineReducers} from 'redux';

const patterns = (state = [], action) => {
  switch(action.type) {
    case 'PATTERNS_FETCH_SUCCESS':
      return action.patterns;
    default:
      return state;
  }
}

const error = (state = false, action) => {
  switch(action.type) {
    case 'PATTERNS_FETCH_SUCCESS':
      return false;
    case 'PATTERNS_FETCH_ERROR':
      return action.error;
    default:
      return state;
  }
}

const loading = (state = 'complete', action) => {
  switch(action.type) {
    case 'PATTERNS_FETCH_LOADING':
      return 'loading';
    case 'PATTERNS_FETCH_SUCCESS':
      return 'complete';
    default:
      return state;
  }
}

const drawer = (state = false, action) => {
  switch(action.type) {
    case 'DRAWER_TOGGLE':
      return !state;
    default:
      return state;
  }
}

const quickLinks = (state = [], action) => {
  switch(action.type) {
    case 'PATTERN_VIEW':
      const pid = action.pattern.id;
      const idx = state.indexOf(pid);
      let newState = state.slice(0);
      if(-1 !== idx) {
        // Pop the item out of the array.
        newState.splice(idx, 1);
      }
      newState.unshift(pid);
      return newState.slice(0, 5);
    default:
      return state;
  }
}

const info = (state = false, action) => {
  switch(action.type) {
      case 'INFO_TOGGLE':
        return !state;
      default:
        return state;
  }
}

export default combineReducers({
  patterns,
  loading,
  error,
  drawer,
  quickLinks,
  info
});