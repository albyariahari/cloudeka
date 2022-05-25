import Card from './Card';
import Button from './Button';

// Components global.

export default {
  install: (app, options) => {
    [
  Card,
  Button,
].forEach(Component => {
  app.component(Component.name, Component)
})
  }
}
