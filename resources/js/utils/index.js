import helper from "./helper";
import permissions from "./permissions";

export default (app) => {
  app.use(helper);
  app.directive(permissions);
};
