
import type { CodegenConfig } from '@graphql-codegen/cli';

const config: CodegenConfig = {
  overwrite: true,
  schema: "http://localhost:8991/graphql",
  generates: {
    "src/gql/": {
      preset: "client",
    }
  }
};

export default config;
