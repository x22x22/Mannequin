import React from 'react';
import SyntaxHighlighter, {
  registerLanguage
} from 'react-syntax-highlighter/dist/light';
import twig from 'react-syntax-highlighter/dist/languages/twig';
import xml from 'react-syntax-highlighter/dist/languages/xml';
import codeStyle from 'react-syntax-highlighter/dist/styles/foundation';

registerLanguage('twig', twig);
registerLanguage('html', xml);

const CodeBlock = ({ language, children }) => (
  <SyntaxHighlighter
    style={codeStyle}
    showLineNumbers={true}
    language={language}
  >
    {children}
  </SyntaxHighlighter>
);

export default CodeBlock;
