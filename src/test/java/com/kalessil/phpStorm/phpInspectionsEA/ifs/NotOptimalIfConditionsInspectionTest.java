package com.kalessil.phpStorm.phpInspectionsEA.ifs;

import com.intellij.testFramework.fixtures.CodeInsightFixtureTestCase;
import com.kalessil.phpStorm.phpInspectionsEA.inspectors.ifs.NotOptimalIfConditionsInspection;

final public class NotOptimalIfConditionsInspectionTest extends CodeInsightFixtureTestCase {
    public void testFalsePositives() {
        myFixture.configureByFile("fixtures/ifs/not-optimal-false-positives.php");
        myFixture.enableInspections(NotOptimalIfConditionsInspection.class);
        myFixture.testHighlighting(true, false, true);
    }
    public void testIssetAndNullComparisonPatterns() {
        myFixture.configureByFile("fixtures/ifs/if-isset-not-null.php");
        myFixture.enableInspections(NotOptimalIfConditionsInspection.class);
        myFixture.testHighlighting(true, false, true);
    }
    public void testInlineBooleansPatterns() {
        myFixture.configureByFile("fixtures/ifs/if-inline-booleans.php");
        myFixture.enableInspections(NotOptimalIfConditionsInspection.class);
        myFixture.testHighlighting(true, false, true);
    }
}