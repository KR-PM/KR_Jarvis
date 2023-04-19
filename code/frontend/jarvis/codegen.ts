
import type { CodegenConfig } from '@graphql-codegen/cli';

const config: CodegenConfig = {
  overwrite: true,
  schema: "http://192.168.84.41:8991/graphql",
  generates: {
    "src/gql/": {
      preset: "client",
    }
  }
};

export default config;
